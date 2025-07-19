import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import SurveyPage from './pages/SurveyPage';
import ResponsePage from './pages/ResponsePage';
import AdminLoginPage from './pages/AdminLoginPage';
import AdminDashboard from './pages/AdminDashboard';
import AdminQuestionnaire from './pages/AdminQuestionnaire';
import AdminResponses from './pages/AdminResponses';
import './App.css';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<SurveyPage />} />
        <Route path="/survey/:token" element={<ResponsePage />} />
        <Route path="/administration/login" element={<AdminLoginPage />} />
        <Route path="/administration" element={<AdminDashboard />} />
        <Route path="/administration/questionnaire" element={<AdminQuestionnaire />} />
        <Route path="/administration/responses" element={<AdminResponses />} />
      </Routes>
    </Router>
  );
}

export default App;
