import React from 'react';
import Question from '../components/Question';

import React, { useState, useEffect } from 'react';
import api from '../api';
import Question from '../components/Question';

const SurveyPage: React.FC = () => {
  const [questions, setQuestions] = useState([]);

  useEffect(() => {
    const fetchQuestions = async () => {
      const response = await api.get('/questions');
      setQuestions(response.data);
    };

    fetchQuestions();
  }, []);

  const handleSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    const formData = new FormData(event.currentTarget);
    const data = Object.fromEntries(formData.entries());
    await api.post('/survey', data);
  };

  return (
    <div>
      <h1>Bigscreen Survey</h1>
      <form onSubmit={handleSubmit}>
        {questions.map((question) => (
          <Question key={question.id} question={question} />
        ))}
        <button type="submit">Submit</button>
      </form>
    </div>
  );
};

export default SurveyPage;
