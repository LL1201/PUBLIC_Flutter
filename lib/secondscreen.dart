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
    final myController = TextEditingController();

    @override
    void dispose() {
      // Clean up the controller when the widget is disposed.
      myController.dispose();
      //super.dispose();
    }

    // Use the Todo to create the UI.
    return Scaffold(
      appBar: AppBar(
        title: Text('Aggiungi nuovo elemento'),
      ),
      body: Column(children: [
        TextFormField(
          controller: myController, // TextEditingController
          decoration: const InputDecoration(
            border: UnderlineInputBorder(),
            labelText: 'Inserisci un titolo per il todo:',
          ),
        ),
        TextFormField(
          controller: myController, // TextEditingController
          decoration: const InputDecoration(
            border: UnderlineInputBorder(),
            labelText: 'Inserisci una descrizione:',
          ),
        )
      ]),
    );
  }
}
