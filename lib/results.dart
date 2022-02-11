import 'package:flutter/material.dart';

//import './textdisplay.dart';
//import './button.dart';

class ResultsScreen extends StatelessWidget {
  //const ResultsScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    // Get parameters from the previous screen:
    final routeArgs =
        ModalRoute.of(context)!.settings.arguments as Map<String, int>;
// Get title and text parameters:
    final correct = routeArgs['correct'];
    final total = routeArgs['total'];
    var incorrect = total! - correct!;
    var perc = correct / total * 100;

    // Use the Todo to create the UI.
    return Scaffold(
        appBar: AppBar(
          title: Text('Quiz terminato!'),
        ),
        body: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              'Risposte corrette: $correct\nRisposte errate: $incorrect \nPercentuale di correttezza: $perc%',
              style: TextStyle(fontSize: 20),
              textAlign: TextAlign.center,
            ),
            ElevatedButton(
              style: ElevatedButton.styleFrom(
                primary: Colors.orange, // Background color
              ),
              onPressed: () {
                Navigator.pop(context);
              },
              child: Text('Riprova!'),
            ),
          ],
        ));
  }
}
