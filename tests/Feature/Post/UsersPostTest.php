<?php

namespace Tests\Feature\Post;


use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UsersPostTest extends TestCase
{
    use LazilyRefreshDatabase;

    // admin page

    // his posts
        // positive
            // C // test_user_can_create_a_post_with_valid_data
            // R // test_user_can_view_edit_form_for_his_post
            // U // test_user_can_update_his_post
            // D // test_user_can_delete_his_post

        // negative
            // C // test_user_cannot_create_a_post_with_invalid_data
            // R // test_user_cannot_view_edit_form_for_invalid_post
            // U // test_user_cannot_update_invalid_post
            // D // test_user_cannot_delete_invalid_post

    // not his posts
        // positive
            // C // test_user_cannot_create_a_post_as_another_user
            // R // test_user_cannot_view_edit_form_for_not_hist_post
            // U // test_user_cannot_update_not_hist_post
            // D // test_user_cannot_delete_not_his_post

        // negative
            // C // test_user_cannot_create_a_post_with_invalid_data
            // R // test_user_cannot_view_edition_form_for_non_existing_post
            // U // test_user_cannot_update_non_existing_post
            // D // test_user_cannot_delete_non_existing_post


    // home page
        // his posts
            // positive
                // C -
                // R // test_user_can_view_his_published_post
                // R // test_user_can_view_another_author_published_post
                // U -
                // D -

            // negative
                // C -
                // R // test_user_cannot_view_his_not_published_post
                // R // test_user_cannot_view_not_his_not_published_post
                // R // test_user_cannot_view_non_existing_post
                // U -
                // D -


        // not his posts
            // positive
                // C -
                // R // test_user_can_view_not_his_published_post
                // U -
                // D -

            // negative
                // C -
                // R // test_user_cannot_view_not_his_not_published_post
                // U -
                // D -





}
