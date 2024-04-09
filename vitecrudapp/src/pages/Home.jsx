import { useState, useEffect } from "react";
import UserList from '../components/UserList';
import CreateUserForm from '../components/CreateUserForm';
import { fetchUsers } from '../api/users';

function Home() {
    const [users, setUsers] = useState([]);

    useEffect(() => {
        fetchAndSetUsers();
    }, []);

    const fetchAndSetUsers = async () => {
        try {
            const usersData = await fetchUsers();
            setUsers(usersData);
        } catch (error) {
            console.log('Error fetching users:', error);
        }
    };

    return (
        <div>
            <h1> User List</h1>
            <UserList users={users} />
            <CreateUserForm getUsers={fetchAndSetUsers} />    
        </div>
    );
}

export default Home;
