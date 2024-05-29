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
      screens: {
        'sm': '427px',
  

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
        "402" : '402px',
        "233" : '233px',
        "31" : '31px',
        "250" : '250px',
        "325" : '325px',
        "203" : '203px',
        "192" : '192px'
        
      },
      backgroundSize: {
        "50%" : '50%',
        '16': '4rem',
      },
      width: {
        "81": '90vh',
        "card" : '610px',
        "777" : '777px',
        "677" : '677px',
        "430" : '430px',
        "768" : '769px',
        "347" : '347px',
        "130" : '130px',
        "384" : '384px',
        "247" : '220px',
        "315" : '315px'
        
      },
      fontSize: {
        "15" : "15px",
        "17" : "17px",
        "10" : "10px",
        "14" : "14px",
        "12" : "12px",
        "20" : "20px",
        "8" : "9px"
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

