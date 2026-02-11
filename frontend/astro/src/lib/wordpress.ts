const WP_GRAPHQL_URL = import.meta.env.WP_GRAPHQL_URL || 'http://localhost:8081/graphql';

export async function wpFetch({ query, variables = {} }) {
  const res = await fetch(WP_GRAPHQL_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ query, variables }),
  });

  const { data, errors } = await res.json();

  if (errors) {
    console.error(errors);
    throw new Error('Failed to fetch API');
  }

  return data;
}
