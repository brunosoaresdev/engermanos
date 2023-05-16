module.exports = {
  darkMode: 'class',
  content: ['./*.{php,html,js}', './**/*.php', './**/**/*.php'],
  theme: {
    fontFamily: {
      'montserrat': ['Montserrat'],
    },
    extend: {
      colors: {
        'orange': '#E66438',
        'gray': '#58585A',
        'white': '#ffffff',
        'black-light': '#222222'
      },
      backgroundImage: {
        'footerAfter': "url('/wp-content/themes/engermanos/assets/images/footerAfter.svg')",
      },
      maxWidth: {
        '2/3': '66%',
      }
    },
  },
  plugins: [],
}

