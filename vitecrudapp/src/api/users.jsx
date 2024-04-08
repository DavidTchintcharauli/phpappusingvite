import axios from 'axios'

export async function getUsers() {
    try {
        const response = await axios.get('/api/users')
        return response.data
    } catch (error) {
        console.error('Error fetching users:', error)
        return []
    }
}