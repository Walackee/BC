import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function usePockets() {
    const pockets = ref([])
    const errors = ref('')
    const router = useRouter()

    const getPockets = async () => {
        let response = await axios.get('/api/pockets')
        pockets.value = response.data.data
    }

    const updatePockets = async () => {
        errors.value = ''
        try {
            await axios.patch('/api/pockets/mass_update', pockets.value)
            await router.push({ name: 'home' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const exportPockets = async () => {
        axios.get('/api/pockets/download_csv', {responseType: 'blob'})
           .then(function (response) {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'cafeteria.csv');
            document.body.appendChild(link);
            link.click();
        });
    }

    return {
        errors,
        pockets,
        getPockets,
        updatePockets,
        exportPockets,
    }
}