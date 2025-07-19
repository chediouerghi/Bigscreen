<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Survey;

class QuestionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $survey = Survey::first();
        if (!$survey) {
            $survey = Survey::create([
                'title' => 'Sondage Bigscreen - Expérience Utilisateur',
                'description' => 'Ce sondage vise à comprendre l\'expérience utilisateur de Bigscreen et à identifier les améliorations possibles.',
                'is_active' => true,
            ]);
        }

        $questions = [
            [
                'survey_id' => $survey->id,
                'question_number' => 1,
                'question_text' => 'What is your favorite VR experience?',
                'question_type' => 'A',
                'options' => json_encode(['Bigscreen', 'VRChat', 'Rec Room', 'Other']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 2,
                'question_text' => 'How often do you use VR per week?',
                'question_type' => 'A',
                'options' => json_encode(['Every day', 'Several times', 'Once', 'Rarely']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 3,
                'question_text' => 'What headset do you use?',
                'question_type' => 'A',
                'options' => json_encode(['Meta Quest', 'Valve Index', 'Pico', 'Other']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 4,
                'question_text' => 'What feature do you want most in Bigscreen?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 5,
                'question_text' => 'How would you rate the image quality?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 6,
                'question_text' => 'How would you rate the audio quality?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 7,
                'question_text' => 'How easy is it to use Bigscreen?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 8,
                'question_text' => 'What is your age group?',
                'question_type' => 'A',
                'options' => json_encode(['<18', '18-24', '25-34', '35-44', '45+']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 9,
                'question_text' => 'What country are you from?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 10,
                'question_text' => 'How did you hear about Bigscreen?',
                'question_type' => 'A',
                'options' => json_encode(['Friend', 'Social Media', 'Store', 'Other']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 11,
                'question_text' => 'What do you dislike about Bigscreen?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 12,
                'question_text' => 'How likely are you to recommend Bigscreen?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 13,
                'question_text' => 'What device do you use Bigscreen on most?',
                'question_type' => 'A',
                'options' => json_encode(['PC', 'Standalone', 'Mobile', 'Other']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 14,
                'question_text' => 'What is your gender?',
                'question_type' => 'A',
                'options' => json_encode(['Male', 'Female', 'Other', 'Prefer not to say']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 15,
                'question_text' => 'What is your favorite movie genre?',
                'question_type' => 'A',
                'options' => json_encode(['Action', 'Comedy', 'Drama', 'Other']),
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 16,
                'question_text' => 'What would you improve in the social features?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 17,
                'question_text' => 'How would you rate the support?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 18,
                'question_text' => 'What is your main reason for using Bigscreen?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 19,
                'question_text' => 'How stable is the application for you?',
                'question_type' => 'C',
                'options' => null,
                'is_required' => true
            ],
            [
                'survey_id' => $survey->id,
                'question_number' => 20,
                'question_text' => 'Any other comments or suggestions?',
                'question_type' => 'B',
                'options' => null,
                'is_required' => false
            ],
        ];
        
        foreach ($questions as $q) {
            Question::create($q);
        }
    }
} 