import { Link, Head } from '@inertiajs/inertia-react';

export default function Welcome({ page }) {
    return (
        <>
            <Head title={page.title}/>
            <h1>Welcome</h1>
            <p>Hello {page.title}, welcome to your first Inertia app!</p>
        </>
    )
}
