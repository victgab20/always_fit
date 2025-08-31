import axios from 'axios'

const baseURL = 'http://localhost'

axios.defaults.baseURL = baseURL
axios.defaults.withCredentials = true

export async function ensureCsrf() {
  await axios.get('/sanctum/csrf-cookie')
}