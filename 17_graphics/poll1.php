<?php
function bar_chart($question, $answers) {

    // define colors to draw the bars
    $colors = array(0xFF6600, 0x009900, 0x3333CC,
        0xFF0033, 0xFFFF00, 0x66FFFF, 0x9900CC);

    $total = array_sum($answers['votes']);
    
    // define spacing values and other magic numbers
    $padding = 5;
    $line_width = 20;
    $scale = $line_width * 7.5;
    $bar_height = 10;

    $x = $y = $padding;

    // allocate a large palette for drawing, since you don't know
    // the image length ahead of time
    $image = ImageCreateTrueColor(150, 500);
    ImageFilledRectangle($image, 0, 0, 149, 499, 0xE0E0E0);
    $black = 0x000000;

    // print the question
    $wrapped = explode("\n", wordwrap($question, $line_width));
    foreach ($wrapped as $line) {
        ImageString($image, 3, $x, $y , $line, $black);
        $y += 12;
    }

    $y += $padding;

    // print the answers
    for ($i = 0; $i < count($answers['answer']); $i++) { 

        // format percentage
        $percent = sprintf('%1.1f', 100*$answers['votes'][$i]/$total);
        $bar = sprintf('%d', $scale*$answers['votes'][$i]/$total);

        // grab color
        $c = $i % count($colors); // handle cases with more bars than colors
        $text_color = $colors[$c];

        // draw bar and percentage numbers
        ImageFilledRectangle($image, $x, $y, $x + $bar,
                             $y + $bar_height, $text_color);
        ImageString($image, 3, $x + $bar + $padding, $y, 
                    "$percent%", $black);

         $y += 12;

         // print answer
         $wrapped = explode("\n", wordwrap($answers['answer'][$i], $line_width));
         foreach ($wrapped as $line) {
             ImageString($image, 2, $x, $y, $line, $black);
             $y += 12;
         }

         $y += 7;
     }

     // crop image by copying it
     $chart = ImageCreateTrueColor(150, $y);
     ImageCopy($chart, $image, 0, 0, 0, 0, 150, $y);

     // PHP 5.5+ supports 
     // $chart = ImageCrop($image, array('x' => 0, 'y' => 0, 
     //                                  'width' => 150, 'height' => $y));

     // deliver image
     header ('Content-type: image/png');
     ImagePNG($chart);

     // clean up
     ImageDestroy($image);
     ImageDestroy($chart);
}
