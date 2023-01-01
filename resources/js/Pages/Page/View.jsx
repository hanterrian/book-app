import { Link, Head } from '@inertiajs/inertia-react';

export default function Welcome(props) {
    return (
        <>
            <Head title={props.page.title}/>
            <h1>Welcome</h1>
            <p>Hello {user.name}, welcome to your first Inertia app!</p>
        </>
    )
}
