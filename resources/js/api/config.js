const config = function (cook) {
  return {
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
      Accept: 'application/json',
      // Token: `${cook}`
    },
  };
};

export default config;
