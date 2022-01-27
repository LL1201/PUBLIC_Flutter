import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Loner Quiz',
      theme: ThemeData(
        primarySwatch: Colors.red,
      ),
      home: const MyHomePage(title: 'Loner Quiz Home Page'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key, required this.title}) : super(key: key);
  final String title;  

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;
  String answerStr="";
  var questions;
  void _incrementCounter() {
    setState(() {
      _counter++;
    });
  }

  void checkAnswer(bool answer) {
    if (answer) {
      answerStr="true";
    } else {
      answerStr="false";
    }
  }

  void doGet() {
    http
        .get(Uri.parse(
            "https://opentdb.com/api.php?amount=10&category=18&type=boolean"))
        .then((response) {
      var jsondata = json.decode(response.body);
      questions = jsondata['results'];

      // Qui inserisci il codice opportuno per gestire lo stato:
      //setState(() {});

      // debug (esempi di stampa dei dati contenuti nel json)
      print("First question: " + questions[0]['question']);
      print("First correct answer: " + questions[0]['correct_answer']);
      print("Category: " + questions[0]['category']);
    });
  }

  @override
  void initState() {
    doGet();
  }

 AlertDialog answerAlert=AlertDialog(
   title: Text('Risposta'),   
 )
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        // Here we take the value from the MyHomePage object that was created by
        // the App.build method, and use it to set our appbar title.
        title: Text(widget.title),
      ),
      body: Center(
        // Center is a layout widget. It takes a single child and positions it
        // in the middle of the parent.
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text(
              questions[_counter]['question'],
            ),
            ElevatedButton(
              onPressed: () {
                checkAnswer(true);
              },
              child: Text('VERO'),
              style: ElevatedButton.styleFrom(
                primary: Colors.green, // Background color
              ),
            ),
            ElevatedButton(
              onPressed: () {
                checkAnswer(false);
              },
              child: Text('FALSO'),
              style: ElevatedButton.styleFrom(
                primary: Colors.red, // Background color
              ),
            )
          ],
        ),
      ),
      // This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
