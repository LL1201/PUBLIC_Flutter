// ignore_for_file: file_names

import 'package:flutter/material.dart';

import 'model/todo.dart';

//import './textdisplay.dart';
//import './button.dart';

class TodoDescription extends StatelessWidget {
  const TodoDescription({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    // Get parameters from the previous screen:
    final routeArgs = ModalRoute.of(context)!.settings.arguments
        as Map<String, Todo>; //MyClass;
    // Get todo parameters:
    final todo = routeArgs['todo'] as Todo;

    // Use the Todo to create the UI.
    return Scaffold(
      appBar: AppBar(
        title: Text(todo.title),
      ),
      body: Column(children: [
        Text(todo.description),
      ]),
    );
  }
}
