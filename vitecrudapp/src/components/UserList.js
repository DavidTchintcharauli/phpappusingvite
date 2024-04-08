function UserList({ users }) {
    return (
      <div>
        <h2>Users</h2>
        {users.length > 0 ? (
          <ul>
            {users.map((user) => (
              <li key={user.id}>
                {user.name} - {user.email}
              </li>
            ))}
          </ul>
        ) : (
          <p>No users found.</p>
        )}
      </div>
    );
  }
  
  export default UserList;