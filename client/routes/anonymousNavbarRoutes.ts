const commonProperties = 'transition-all duration-300 px-4 py-2 block rounded-lg lg:ml-4 border';

export default (isTop: boolean) => [
  {
    children: 'login',
    className: `${commonProperties} mb-2 lg:mb-0 ${isTop ? 'border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-indigo-700' : 'border-indigo-700 text-indigo-700 hover:bg-indigo-700 hover:text-gray-300'}`,
    href: '/login',
  },
  {
    children: 'register',
    className: `${commonProperties} hover:bg-transparent ${isTop ? 'bg-gray-300 text-indigo-700 border-gray-300 hover:text-gray-300' : 'bg-indigo-700 text-gray-300 border-indigo-700 hover:text-indigo-700'}`,
    href: '/register',
  },
];
