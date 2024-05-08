/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily : {
        "montserrat" : ['montserrat']
      },
      colors : {
        "coklat" : '#371206',
        "krem" : '#FFFBF7',
        "cokmud" : '#6D4E46',
        "c1" : '#65443AE5',
        "c2" : '#7C6058CC',
        "c3" : '#A08E8980'
      },
      height : {
        "81" : '605px',
        "card" : '294px',
        "448" : '448px',
        "587" : '587px',
        "402" : '402px'
      },
      backgroundSize: {
        "50%" : '50%',
        '16': '4rem',
      },
      width: {
        "81": '90vh',
        "card" : '610px',
        "777" : '777px',
        "677" : '677px'
      },
      fontSize: {
        "15" : "15px"
      },
      margin: {
        "120" : '640px',
        "98" : '98px'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

