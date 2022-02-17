/*
  Nice example of sending data to a new screen:
  https://docs.flutter.dev/cookbook/navigation/passing-data
  https://docs.flutter.dev/cookbook/navigation/navigate-with-arguments
 */

import 'package:flutter/foundation.dart';
import 'package:textfield/todoDescription.dart';

import 'secondscreen.dart';
import 'package:flutter/material.dart';
import 'todo.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Loner todo app',
      theme: ThemeData(
        primarySwatch: Colors.red,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Loner todo app'),
      // Define here the routes for the other app screens:
      routes: {
        '/secondscreen': (ctx) => SecondScreen(),
        '/todoDescription': (ctx) => TodoDescription(),
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
}

class _MyHomePageState extends State<MyHomePage> {
  var _index = 0;

  // Lista elementi
  final List<Todo> todos = [];

  void viewSecondScreen(BuildContext context) async {
    // Navigator.push returns a Future that completes after calling
    // Navigator.pop on the Selection Screen.

    final Todo newTodo = await Navigator.push(
      context,
      // Create the SelectionScreen in the next step.
      MaterialPageRoute(builder: (context) => const SecondScreen()),
    );

    setState(() {
      todos.add(newTodo);
      final snackBar = SnackBar(
          content: Text(newTodo.title.toString() + ' aggiunto!'),
          action: SnackBarAction(
            label: 'Undo',
            onPressed: () {
              undoAction(context);
            },
          ));
      ScaffoldMessenger.of(context).showSnackBar(snackBar);
    });
  }

  void undoAction(BuildContext context) async {
    setState(() {
      todos.remove(todos.last);
    });
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
              Navigator.of(context).pushNamed('/todoDescription', arguments: {
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
                viewSecondScreen(context);
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
