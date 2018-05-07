<?php
    require_once '../bootstrap.php';
    require_once '../models/RecipesModel.php';

    $dbModel = new RecipesModel();

    // Get comment data
    $input = [
        'rid' => $_GET['rid'],
        'comment' => $_GET['comment'],
        'rating' => $_GET['rating']
    ];

    // Get result of comment
    $result = $dbModel->addNewComment($input);

    // If result was false, PDO exception occurred
    if($result == false) {
        echo json_encode(array('success' => false));
        return;
    }

    // Construct json output
    $element = '<div>
                    <label>Author: '.$result->ownerid.'</label></br>
                    <label>date: '.$result->date.'</label></br>
                    <label>Comment: '.$result->comment_description.'</label></br>
                    <label>Rating: '.$result->rating.'</label></br>
                </div>';

    $jsonOutput = array(
        'success'=> true,
        'commentElement'=> $element
    );

    echo json_encode($jsonOutput);
?>