function DeleteUserButton({ user, deleteUser, getUsers }) {
    const handleSubmit = () => {
        deleteUser(user.id);

        getUsers();
    }

    return (
        <button onClick={handleSubmit}>Delete User</button>
    )
}

export default DeleteUserButton;