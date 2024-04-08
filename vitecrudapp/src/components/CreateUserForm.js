import { useState } from "react";

function CreateUserForm({ getUsers }) {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();

        const newUser ={
            name,
            email,
        };

        createUser(newUser);

        setName('');
        setEmail('');

        getUsers();
    };

    const createUser = async (user) => {
        try {
            await fetch('api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(user),
            });
        } catch (error) {
            console.error('Error creating user:', error);
        }
    };

    return (
        <div>
            <h2>Create User</h2>
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
                <button type="submit">Create</button>
            </form>
        </div>
    )
}

export default CreateUserForm;