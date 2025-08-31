import axios from 'axios'
import { ensureCsrf } from '@/bootstrap'

export async function loginToken(email: string, password: string) {
  await ensureCsrf()

  await axios.post('/login', { email, password })
}

export async function logoutToken() {
  await axios.post('/logout')
}
