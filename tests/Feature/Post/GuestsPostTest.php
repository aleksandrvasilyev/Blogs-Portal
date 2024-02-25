<?php

namespace Tests\Feature\Post;


use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class GuestsPostTest extends TestCase
{
    use LazilyRefreshDatabase;

    // admin page

    // his posts
        // positive
            // C // test_guest_cannot_create_a_post_with_valid_data
            // R // test_guest_cannot_view_edit_form_for_a_post
            // U // test_guest_cannot_update_his_existing_post
            // D // test_guest_cannot_delete_the_existing_post

        // negative
            // C // test_guest_cannot_create_a_post_with_invalid_data
            // R // test_guest_cannot_view_edit_form_for_non_existing_post
            // U // test_guest_cannot_update_non_existing_post
            // D // test_guest_cannot_delete_non_existing_post



    // home page

        // his posts
            // positive
                // C -
                // R // test_guest_can_view_published_post
                // U -
                // D -

            // negative
                // C -
                // R // test_user_cannot_view_not_published_post
                // R // test_user_cannot_view_non_existing_post
                // U -
                // D -

}
