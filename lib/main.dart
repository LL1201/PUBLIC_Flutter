// This app gets data from Firebase RealTime database through http requests
// https://pub.dev/packages/http

import 'dart:convert';

import 'Question.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import './textdisplay.dart';
import './button.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Loner Quiz App',
      theme: ThemeData(
        primarySwatch: Colors.amber,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Loner Quiz'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key? key, required this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  // Sample url:
  final baseurl = "https://opentdb.com/api.php?amount=10&category=18";

  List<Question>? _questions = null; // questions data structure
  List<String>? _answers = null; // answers list
  var _index = 0;

  // Go to next question:
  void next() {
    if (_questions == null || _questions!.length == 0) return;
    setState(() {
      if (_index < _questions!.length - 1)
        _index++;
      else {
        _index = 0;
        showDialog(
            context: context,
            builder: (ctx) => AlertDialog(
                  title: Text('Finito'),
                  content: Text('Hai completato il quiz'),
                  actions: <Widget>[
                    FlatButton(
                      autofocus: true,
                      child: Text('OK'),
                      onPressed: () {
                        doGet();
                        Navigator.of(ctx).pop(true);
                      },
                    )
                  ],
                ));
      }
      // update answers:
      _answers = List.from(_questions![_index].incorrect);
      _answers!.add(_questions![_index].correct);
      _answers!.shuffle();
    });
  }

  // Get data
  void doGet() {
    http.get(Uri.parse(baseurl)).then((response) {
      var jsondata = json.decode(response.body);
      var questions = jsondata['results'];

      // create data structure with questions
      setState(() {
        _questions =
            questions.map<Question>((val) => Question.fromJson(val)).toList();
        // initialize answer list:
        _answers = List.from(_questions![_index].incorrect);
        _answers!.add(_questions![_index].correct);
        _answers!.shuffle();
      });

      // debug
      /*print("First question: " + questions[0]['question']);
      print("First question: " + questions[0]['correct_answer']);
      print("category: " + questions[0]['category']);*/
    });
  }

  // Post data to Firebase
  void doPost(String postUrl) {
    http
        .post(Uri.parse(postUrl),
            body: json.encode({
              'name': "Pluto",
              'email': "pluto@whitehouse.gov",
              'zipcode': 12364,
              'id': 0
            }))
        .then((response) {
      var jsondata = json.decode(response.body);

      // debug
      print("Server response: " + response.statusCode.toString());
    });
  }

  // Check if the answer is correct and display an AlertDialog:
  void _checkAnswer(String ans) {
    bool correct = false;
    String msg = "HAI SBAGLIATO!!!!!!!!! ";
    if (ans == _questions![_index].correct) {
      msg = "Sarà fortuna?";
      correct = true;
    }

    showDialog(
        context: context,
        builder: (ctx) => AlertDialog(
              title: Text('Result'),
              content: Text(msg),
              actions: <Widget>[
                FlatButton(
                  autofocus: true,
                  child: Text('OK'),
                  onPressed: () {
                    Navigator.of(ctx).pop(true);
                    if (correct) next();
                  },
                )
              ],
            ));
  }

  // Return a list of buttons with the answers to put in the screen:
  List<Widget> _buildAnswerButtons(List<String> ans) {
    return ans
        .map<Button>((e) => Button(
            selectHandler: () => _checkAnswer(e),
            buttonText: e,
            color: Colors.orange))
        .toList();
  }

  // Load data from Open Trivia DB at the beginning:
  void initState() {
    doGet();
    //assert(_debugLifecycleState == _StateLifecycle.created);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
        actions: <Widget>[
          FlatButton(
            textColor: Colors.white,
            onPressed: () {
              next();
            },
            child: Text(
              "Next",
              style: TextStyle(
                color: Colors.black,
              ),
            ),
            shape: CircleBorder(side: BorderSide(color: Colors.transparent)),
          ),
        ],
      ),
      body: Column(
        children: [
          TextDisplay(
            (_questions != null && _questions![0] != null)
                ? _questions![_index].question
                : 'none',
          ),
          if (_answers != null && _buildAnswerButtons(_answers!) != null)
            ..._buildAnswerButtons(_answers!)
          else
            const CircularProgressIndicator(), //Text('Load Quiz!'),
          //Button(selectHandler: next, buttonText: 'next'),
        ],
      ),
    );
  }
}
