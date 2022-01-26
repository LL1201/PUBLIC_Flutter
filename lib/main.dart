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
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'Flutter Demo Home Page'),
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
  var questions;
  void _incrementCounter() {
    setState(() {
      _counter++;
    });
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
  Widget build(BuildContext context) {
    doGet();
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
              style: Theme.of(context).textTheme.headline4,
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: _incrementCounter,
        tooltip: 'Increment',
        child: const Icon(Icons.add),
      ), // This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
