import React from 'react';
import { render } from '@testing-library/react';
import Login from './Login';

test('renders learn react link', () => {
  const { getByText } = render(<Login />);
  const title = getByText(/Login/);
  expect(title).toBeInTheDocument();
});
