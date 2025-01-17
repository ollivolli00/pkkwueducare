<template>
  <div>
    <ul>
      <li v-for="result in results" :key="result.id">
        <a :href="'/beasiswa/' + result.id">{{ result.namabeasiswa }}</a>
      </li>
    </ul>
    <div v-if="results.length === 0">No results found</div>
  </div>
</template>
