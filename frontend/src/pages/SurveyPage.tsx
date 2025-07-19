import React, { useEffect, useState } from "react";
import api from "../api";
import Question from "../components/Question";
import { type } from "os";

interface QuestionOption {
  value: string;
  label: string;
}

interface QuestionType {
  id: number;
  title: string;
  body: string;
  type: string;
  options?: QuestionOption[];
}

function SurveyPage() {
  const [questions, setQuestions] = useState<QuestionType[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);
  const [success, setSuccess] = useState<string | null>(null);

  useEffect(() => {
    const fetchQuestions = async () => {
      setLoading(true);
      setError(null);
      try {
        const response = await api.get("/questions");
        setQuestions(response.data);
      } catch (err: any) {
        setError("Erreur lors du chargement des questions. Veuillez réessayer plus tard.");
      } finally {
        setLoading(false);
      }
    };
    fetchQuestions();
  }, []);

  const handleSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setError(null);
    setSuccess(null);
    const formData = new FormData(event.currentTarget);
    const data = Object.fromEntries(formData.entries());
    try {
      await api.post("/survey", data);
      setSuccess("Merci pour votre participation !");
    } catch (err: any) {
      setError("Erreur lors de l'envoi du questionnaire. Veuillez réessayer.");
    }
  };

  return (
    <div className="survey-page">
      <h1>Bigscreen Survey</h1>
      {loading && <p>Chargement des questions...</p>}
      {error && <div className="error-message">{error}</div>}
      {success && <div className="success-message">{success}</div>}
      {!loading && !error && (
        <form onSubmit={handleSubmit}>
          {questions.map((question: QuestionType) => (
            <Question key={question.id} question={question} />
          ))}
          <button type="submit">Envoyer</button>
        </form>
      )}
    </div>
  );
}

export default SurveyPage;
