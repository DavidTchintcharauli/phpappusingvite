import { useState, useEffect } from "react";

function UpdateUserForm({ user, updateUser, getUsers }) {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');

    useEffect(() => {
        setName(user.name);
        setEmail(user.email);
    }, [user]);

    const handleSubmit = (e) => {
        e.preventDefault();

        const updateUser = {
            id: user.id,
            name,
            email,
        };

        updateUser(updateUser)

        getUsers()
    };

    return (
        <div>
            <h2>update User</h2>
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

export default UpdateUserForm;