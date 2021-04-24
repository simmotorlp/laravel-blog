<template>
   <div>
       <ul>
           <li v-for="post in posts" :key="post.id">
               <div>{{ post.title }}</div>
           </li>
       </ul>
   </div>
</template>
<script>
import Default from '../Layout/Default'

export default {
    layout: Default,
    props:{
        posts: {}
    }
}
</script>
