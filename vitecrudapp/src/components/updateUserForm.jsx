import { useState, useEffect } from "react";
import PropTypes from 'prop-types';

function UpdateUserForm({ user, updateUserFunc, getUsers }) {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
  
    useEffect(() => {
      setName(user.name);
      setEmail(user.email);
    }, [user]);
  
    const handleSubmit = (e) => {
      e.preventDefault();
  
      const updatedUser = {
        id: user.id,
        name,
        email,
      };
  
      updateUserFunc(updatedUser);
  
      getUsers();
    };
  
    return (
      <div>
        <h2>Update User</h2>
        <form onSubmit={handleSubmit}>
          <label>
            Name:
            <input
              type="text"
              value={name}
              onChange={(e) => setName(e.target.value)}
              required
            />
          </label>
          <br />
          <label>
            Email:
            <input
              type="email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              required
            />
          </label>
          <br />
          <button type="submit">Update</button>
        </form>
      </div>
    );
  }
  
  UpdateUserForm.propTypes = {
    user: PropTypes.shape({
      id: PropTypes.number.isRequired,
      name: PropTypes.string.isRequired,
      email: PropTypes.string.isRequired,
    }).isRequired,
    updateUserFunc: PropTypes.func.isRequired,
    getUsers: PropTypes.func.isRequired,
  };
  
  export default UpdateUserForm;