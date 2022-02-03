import 'package:flutter/material.dart';
import 'package:html/dom.dart' as htmlParser; // to print html chars

class Button extends StatelessWidget {
  final Function() selectHandler;
  final String buttonText;
  final Color color;

  Button(
      {required this.selectHandler,
      required this.buttonText,
      this.color = Colors.blue});

  @override
  Widget build(BuildContext context) {
    return Container(
      child: ElevatedButton(
        style: ElevatedButton.styleFrom(
          primary: this.color, // Background color
        ),
        child:
            Text(htmlParser.DocumentFragment.html(buttonText).text.toString()),
        onPressed: selectHandler,
      ),
    );
  }
}
