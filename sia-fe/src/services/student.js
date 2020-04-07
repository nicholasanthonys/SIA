import axios from 'axios'

export const getStudents = async () => {
    return axios.get('/api/students')
}

export const getStudent = async id => {
    return axios.get('/api/students/' + id)
}

export const createStudent = async student => {
    return axios.post('/api/students',student, {
        header : {
            'Content-Type' : 'application/json'
        }
    })
}

export const updateStudent = async student => {
    return axios.put('/api/students/' + student.id, student, {
        header : {
            'Content-Type' : 'application/json'
        }
    })
}

export const deleteStudent = async id => {
    return axios.delete('/api/students/' + id)
}
