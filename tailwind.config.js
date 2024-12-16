/** @type {import('tailwindcss').Config} config */
const config = {
  content: [
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './resources/**/*.blade.php',
    './resources/views/**/*.blade.php',
    './resources/views/components/**/*.blade.php',
    './resources/views/layouts/**/*.blade.php',
    './resources/views/partials/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'ram-blue': {
          DEFAULT: '#0087FF',
          light: '#66B7FF',
          dark: '#005199',
        },
        'ram-purple': {
          DEFAULT: '#9B00FF',
          light: '#C366FF',
          dark: '#5D0099',
        },
      },
      fontFamily: {
        'sans': ['Inter', 'system-ui', 'sans-serif'],
        'display': ['Montserrat', 'system-ui', 'sans-serif'],
      },
      boxShadow: {
        'soft': '0 2px 15px rgba(0, 0, 0, 0.05)',
        'medium': '0 4px 20px rgba(0, 0, 0, 0.1)',
        'hard': '0 8px 30px rgba(0, 0, 0, 0.15)',
      },
      height: {
        'screen-90': '90vh',
      },
      maxWidth: {
        '8xl': '88rem',
        '9xl': '96rem',
      },
      scale: {
        '102': '1.02',
        '103': '1.03',
        '105': '1.05',
      },
      transitionDuration: {
        '250': '250ms',
        '350': '350ms',
      },
      transitionTimingFunction: {
        'bounce-sm': 'cubic-bezier(0.4, 2.5, 0.6, 1)',
      },
    },
  },
  plugins: [],
  safelist: [
    'text-ram-blue',
    'text-ram-blue-light',
    'text-ram-blue-dark',
    'text-ram-purple',
    'text-ram-purple-light',
    'text-ram-purple-dark',
    'bg-ram-blue',
    'bg-ram-blue-light',
    'bg-ram-blue-dark',
    'bg-ram-purple',
    'bg-ram-purple-light',
    'bg-ram-purple-dark',
    'shadow-soft',
    'shadow-medium',
    'shadow-hard',
    'duration-250',
    'duration-350',
    'ease-bounce-sm',
    'scale-102',
    'scale-103',
    'scale-105',
    'hover:scale-102',
    'hover:scale-103',
    'hover:scale-105',
    'hover:shadow-medium',
    'hover:shadow-hard',
    'hover:bg-ram-blue',
    'hover:bg-ram-blue-dark',
    'hover:text-white',
  ],
};

export default config;
