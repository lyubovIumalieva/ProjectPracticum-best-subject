<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Option;

class ApiController extends Controller
{
  public function store(Request $request)
  {
    $test = new Test([
        'name' => $request->input('testname')
    ]);
    $test->save();
    $questions = $request->input('questions');

    foreach ($questions as $question) {
      $newQuestion = new Question(['question_text' => $question['question_text']]);
      $test->questions()->save($newQuestion);
      foreach ($question['options'] as $option) {
        if($option['option_text'] != '') {
          $newOption = new Option([
              'option_text' => $option['option_text'],
              'is_correct' => $option['is_correct'],
          ]);
          $newQuestion->options()->save($newOption);
        }
        unset($newOption);
      }
      unset($newQuestion);
    }
    return response()->json(['data' => $test->id], 201);
  }
}
