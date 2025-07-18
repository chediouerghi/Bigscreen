import React from 'react';

interface QuestionProps {
  question: {
    id: number;
    title: string;
    body: string;
    type: string;
    options?: any;
  };
}

const Question: React.FC<QuestionProps> = ({ question }) => {
  return (
    <div>
      <h2>{question.title}</h2>
      <p>{question.body}</p>
      {renderQuestionInput()}
    </div>
  );

  function renderQuestionInput() {
    switch (question.type) {
      case 'A':
        return (
          <select>
            {question.options.map((option: any) => (
              <option key={option} value={option}>
                {option}
              </option>
            ))}
          </select>
        );
      case 'B':
        return <input type="text" maxLength={255} />;
      case 'C':
        return (
          <select>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        );
      default:
        return null;
    }
  }
};

export default Question;
