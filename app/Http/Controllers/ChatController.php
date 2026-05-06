<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $message = strtolower(trim($request->message));

        $history = session()->get('history', []);

        $history[] = [
            'role' => 'user',
            'content' => $request->message
        ];

        if ($message == 'hi') {

            $reply = "Hello";
        } elseif ($message == 'hello') {

            $reply = "Hi there!";
        } else {

            $allowedTopics = [
                'solar system',
                'solarsystem',
                'solar',

                'fraction',
                'fractions',

                'water cycle',
                'watercycle',
                'water'
            ];

            $valid = false;

            foreach ($allowedTopics as $topic) {

                if (str_contains($message, $topic)) {
                    $valid = true;
                    break;
                }
            }

            if (!$valid) {

                $reply = "I can only help with Solar System, Fractions, or Water Cycle topics for now.";
            } else {

                if (
                    str_contains($message, 'solar system') ||
                    str_contains($message, 'solarsystem') ||
                    str_contains($message, 'solar')
                ) {
                    $reply = "The Solar System consists of the Sun and all the planets that orbit around it. The eight major planets are Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uranus, and Neptune. Gravity keeps them moving around the Sun.";
                } elseif (
                    str_contains($message, 'fraction') ||
                    str_contains($message, 'fractions')
                ) {

                    $reply = "Fractions represent parts of a whole. A fraction has a numerator on top and a denominator at the bottom. For example, 1/2 means one out of two equal parts. Fractions are commonly used in mathematics and daily life.";
                } elseif (
                    str_contains($message, 'water cycle') ||
                    str_contains($message, 'watercycle') ||
                    str_contains($message, 'water')
                ) {

                    $reply = "The Water Cycle is the continuous movement of water on Earth. Water evaporates from oceans and lakes, forms clouds through condensation, and returns as rain through precipitation. This process helps maintain life on Earth.";
                } else {

                    $reply = "Hello student! I am here to help you learn.";
                }
            }
        }

        $history[] = [
            'role' => 'assistant',
            'content' => $reply
        ];

        session()->put('history', $history);

        return redirect('/');
    }

    public function reset()
    {
        session()->forget('history');

        return redirect('/');
    }
}
