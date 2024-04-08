import PropTypes from 'prop-types';

function DeleteUserButton({ user, deleteUser, getUsers }) {
  const handleSubmit = () => {
    deleteUser(user.id);

    getUsers();
  }

  return (
    <button onClick={handleSubmit}>Delete User</button>
  )
}

DeleteUserButton.propTypes = {
  user: PropTypes.shape({
    id: PropTypes.number.isRequired,
  }).isRequired,
  deleteUser: PropTypes.func.isRequired,
  getUsers: PropTypes.func.isRequired,
};

export default DeleteUserButton;