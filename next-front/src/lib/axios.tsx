import axios from "axios";

const api = axios.create({
    baseURL : process.env.server,
    headers: {
        'X-Requested-With':'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    withCredentials : true,
})
export default api;