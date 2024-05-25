<template>
홀짝
</template>
<script setup>
// -------------- import ---------------

import {onMounted} from "vue";

onMounted(() => {
    console.log('mount')
    window.Echo.channel(`database_holzzak`).listen('.gameWaitSecond', async (event) => {
        console.log('ss', event);
    })
})

</script>
