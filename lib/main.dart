/*
  Nice example of sending data to a new screen:
  https://docs.flutter.dev/cookbook/navigation/passing-data
  https://docs.flutter.dev/cookbook/navigation/navigate-with-arguments
 */

import 'secondscreen.dart';
import 'package:flutter/material.dart';

import './textdisplay.dart';
import './button.dart';
import 'model/todo.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Luke Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.red,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Luke App'),
      // Define here the routes for the other app screens:
      routes: {
        '/secondscreen': (ctx) => SecondScreen(),
      },
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key? key, required this.title}) : super(key: key);

  // Simil overloading:
  MyHomePage.myconstr({required this.title});
  // final boh = MyHomePage.myconstr(title: 'Pippo',);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();

  /*
  @override
  State<StatefulWidget> createState() {
    // TODO: implement createState
    return _MyHomePageState(); 
  } */
}

class _MyHomePageState extends State<MyHomePage> {
  var _index = 0;

  var _displayMessages = [
    'Hello World',
    'Ciao Mondo',
    'Hallo Welt',
    'Bonjour le Monde',
    'Hola Mundo',
    'Saluton mondo',
  ];

  // Lista elementi
  final todos = List.generate(
    20,
    (i) => Todo(
      'Todo $i',
      'A description of what needs to be done for Todo $i',
    ),
  );

  void _changeMessage() {
    setState(() {
      if (_index >= _displayMessages.length - 1)
        _index = 0;
      else
        _index += 1;
    });
    print(_index);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: ListView.builder(
        itemCount: todos.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(todos[index].title),
            onTap: () {
              Navigator.of(context).pushNamed('/secondscreen', arguments: {
                'todo': todos[index],
              });
            },
          );
        },
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerFloat,
      floatingActionButton: Stack(
        fit: StackFit.expand,
        children: [
          Positioned(
            bottom: 20,
            right: 30,
            child: FloatingActionButton(
              heroTag: 'next',
              onPressed: () {
                Navigator.of(context).pushNamed('/secondscreen');
              },
              child: Icon(
                Icons.add,
                size: 32,
              ),
            ),
          ),
        ],
      ),
    );
  }
}
