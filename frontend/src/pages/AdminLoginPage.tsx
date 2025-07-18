import React from 'react';

const AdminLoginPage: React.FC = () => {
  return (
    <div>
      <h1>Admin Login</h1>
      <form>
        <label>
          Email:
          <input type="email" />
        </label>
        <label>
          Password:
          <input type="password" />
        </label>
        <button type="submit">Login</button>
      </form>
    </div>
  );
};

export default AdminLoginPage;
