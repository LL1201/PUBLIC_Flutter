import 'package:flutter/material.dart';

import 'model/todo.dart';

//import './textdisplay.dart';
//import './button.dart';

class SecondScreen extends StatelessWidget {
  const SecondScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    // Get parameters from the previous screen:
    //final routeArgs = ModalRoute.of(context)!.settings.arguments as Map<String, Todo>; //MyClass;
    // Get todo parameters:
    //final todo = routeArgs['todo'] as Todo;
    final titleController = TextEditingController();
    final descriptionController = TextEditingController();

    @override
    void dispose() {
      // Clean up the controller when the widget is disposed.
      titleController.dispose();
      descriptionController.dispose();
      //super.dispose();
    }

    // Use the Todo to create the UI.
    return Scaffold(
      appBar: AppBar(
        title: Text('Aggiungi nuovo elemento'),
      ),
      body: Column(children: [
        TextFormField(
          controller: titleController, // TextEditingController
          decoration: const InputDecoration(
            border: UnderlineInputBorder(),
            labelText: 'Inserisci un titolo per il todo:',
          ),
        ),
        TextFormField(
          controller: descriptionController, // TextEditingController
          decoration: const InputDecoration(
            border: UnderlineInputBorder(),
            labelText: 'Inserisci una descrizione:',
          ),
        ),
        ElevatedButton(
            onPressed: () => Navigator.pop(context,
                Todo(titleController.text, descriptionController.text)),
            child: Text('Aggiungi elemento'))
      ]),
    );
  }
}
