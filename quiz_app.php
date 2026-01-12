<?php
// multidimensional associative array so that it store whole quiz
$quizArray=
    [
            // There are 3 categories : Cricket, Movies and Technology
        //1.Cricket
    'Cricket' =>
        [
            ['Question' => 'Who won the T20 world cup of cricket in 2024?',
              'Answer' => ['India','Australia','England','Canada'],
               'Correct'=>  ['India']
            ],
            ['Question' => 'Which players have scored 10,000+ runs on Test cricket ',
                'Answer' => ['Sachin Tendulkar ','Brian Lara','Ricky Ponting','Jasprit Bumrah'],
                'Correct'=>  ['Sachin Tendulkar ','Brian Lara','Ricky Ponting']
            ],
            ['Question' =>'Which of the following are forms of cricket?',
                'Answer' => ['Test cricket','One day Internationals','Twenty20','Indoor cricket'],
                'Correct'=> ['Test cricket','One day Internationals','Twenty20']
            ]
        ],
        //2.Movies
        'Movies'=>
        [
            ['Question' => 'Which movie won the oscar in 2024'
                ,'Answer' => ['Everything Everywhere All at Once','Triangle of Sadness','Avatar: The Way of Water','Women Talking'],
                'Correct' => ['Everything Everywhere All at Once']
            ],

            [
            'Question' => 'Which movies are part of the Marvel Cinematic Universe(MCU)?'
            ,'Answer' => ['Guardians of the Galaxy','The Batman','Thor:Ragnarok',' Wonder Women']
            ,'Correct' => ['Guardians of the Galaxy','Thor:Ragnarok']
            ],
            [
            'Question' => 'Which movies depict major cricket tournaments or matches?'
            ,'Answer' => ['Guardians of the Galaxy','The Batman','Thor:Ragnarok',' Wonder Women']
            ,'Correct' => ['Guardians of the Galaxy','Thor:Ragnarok']
            ]

        ],
        //3.Technology
        'Technology'=>
            [
                [
                'Question'=>'When was first the iPhone released?',
                'Answer'=>['2007','2003','2004','2001'],
                'Correct'=>['2007']
                ],
                [
                    'Question'=>'Which of these companies are involved in cloud computing?',
                    'Answer'=>['Amazon','Microsoft','Google','Facebook'],
                    'Correct'=>['Amazon','Microsoft','Google']
                ],
                [
                    'Question'=>'Which of the following are operating system?',
                    'Answer'=>['Windows','macOS','Linux','Facebook'],
                    'Correct'=>['Windows','macOS','Linux']
                ]
            ]
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
#Technology{
    background: black;
    color: aliceblue;
}
</style>
<body>
// Created a form to choose one category
<form action="quiz_app.php" method="post" id="test">
    <label for="selectCategory">Select the Category</label>
    <select name="Category" id="selectCategory">
        <option class="options" value="">Select the Category</option>
        <option class="options" value="Cricket">Cricket</option>
        <option class="options" value="Movies">Movies</option>
        <option class="options" value="Technology">Technology</option>
    </select>
    <br>
    <input type="submit" value="Start Quiz" id="start_quiz" onclick=" message()">
</form>


    <script>
        // this a function used for selecting the category
        function  message() {
            let s = document.getElementById('selectCategory');
            let selectCategory;
            selectCategory = s.selectedIndex;

            if (selectCategory === 0) {
                //alert message if category is selected
                alert("Please select a category to start quiz");
            }
            else if (selectCategory === 1)
            //If Cricket is selected then quiz will start
            { document.write("<?php
                $question=$quizArray['Cricket'];
                // using array_rand to choose any random question from cricket category
                $randomQuestion=array_rand($question,1);
                echo"<form action='quiz_app.php' method='post' id='Cricket' style='background: black; color: aliceblue;'>";

                echo $question[$randomQuestion]['Question'] ;// Print the Question of cricket

                foreach ($question[$randomQuestion]['Answer'] as $answer)// Comparing answer with user selected answer
                {
                    echo "<br> <div class='answer' >";
                    if(in_array($answer,$question[$randomQuestion]['Correct']))
                    {
                        echo "<input type='hidden' name='correct' value='correct'>";

                    }
                    else{
                        echo "<input type='hidden' name='wrong' value='wrong'>";
                    }
                    echo" <input name='checkbox[]' type='checkbox' ><label>$answer</label></div>";
                }
                echo "<br><input type='submit' id='cricket' class='submit' value='Submit' onclick='checkAnswer(event)'> ";// Checking the answer using function

                echo "</form>";
                ?>");

            }
            else if (selectCategory === 2) {
                //If Movies is selected then quiz will start
                document.write("<?php
                    $question = $quizArray['Movies'];
                    $randomQuestion = array_rand($question, 1);
                    echo "<form action='quiz_app.php' method='post' id='Movies' style='background: black; color: aliceblue;'>";

                    echo $question[$randomQuestion]['Question'];// Print the Question of Movies

                    foreach ($question[$randomQuestion]['Answer'] as $answer)// Comparing answer with user selected answer
                    {
                        echo "<br> <div class='answer' >";
                        if(in_array($answer,$question[$randomQuestion]['Correct']))
                        {
                            echo "<input type='hidden' name='correct' value='correct'>";

                        }
                        else{
                            echo "<input type='hidden' name='wrong' value='wrong'>";
                        }
                        echo" <input name='checkbox[]' type='checkbox' ><label>$answer</label></div>";
                    }
                    echo "<br><input type='submit' id='movies' class='submit' value='Submit' onclick='checkAnswer(event)'> ";// Checking the answer using function
                    echo "</form>";
                    ?>");


            }
            else if (selectCategory === 3)
            {
                //If Movies is selected then quiz will start
                document.write("<?php
                    $question=$quizArray['Technology'];
                    $randomQuestion=array_rand($question,1);
                    echo"<form action='quiz_app.php' method='post' id='Technology' style='background: black; color: aliceblue;'>";

                    echo $question[$randomQuestion]['Question'] ;// Print the Question of Technology

                    foreach ($question[$randomQuestion]['Answer'] as $answer)// Comparing answer with user selected answer
                    {
                        echo "<br> <div class='answer' >";
                        if(in_array($answer,$question[$randomQuestion]['Correct']))
                        {
                            echo "<input type='hidden' name='correct' value='correct'>";

                        }
                        else{
                            echo "<input type='hidden' name='wrong' value='wrong'>";
                        }
                        echo" <input name='checkbox[]' type='checkbox' ><label>$answer</label></div>";
                    }
                    echo "<br><input type='submit' id='technology' class='submit' value='Submit' onclick='checkAnswer(event)'>";// Checking the answer using function
                    echo "</form>";
                    ?>");


            }
            return 0;

        }
        function checkAnswer(e)

        {
            e.preventDefault();// prevent default of form to keep on refreshing
            let d= document.querySelectorAll('.answer');
            let selected=[];

            for(let i=0; i<4; i++ )
            {
                console.log(d[i].checked);
              if(d[i].children[1].checked )
              {
                  selected.push(d[i]);// selected the answer
              }

            }
            if (selected.length===0)
            {
                // If nothing is selected then show error message
                alert('You must select at least one answer to submit quiz');

            }
            else {
                let feedback=true;
                // used for highlighting correct and wrong answer so that user can get a simple idea
                for(let selectedAnswer of selected) {
                    console.log(selectedAnswer.children[0].value)
                    let checkAns=selectedAnswer.children[0].value;

                    if(checkAns === "correct"){
                        // background changes to green when user select the correct option
                    selectedAnswer.style.backgroundColor ="green";

                    }
                    else {
                        // background changes to red when user select the wrong option
                        selectedAnswer.style.backgroundColor ="red";
                        feedback=false;
                    }
                }
                if(feedback===true){
                    // Giving user feedback that they have chosen correct answer
                    document.write("All answers selected are correct");

                }else
                {
                    // Giving user feedback that they have chosen wrong or wrong and right answer
                    document.write("You have chosen incorrect answer ");
                }


            }

        }

    </script>
<?php
show_source('quiz_app.php');
?>
</body>
</html>
