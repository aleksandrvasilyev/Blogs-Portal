<?php

namespace Tests\Feature\Comment;


use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class GuestsCommentTest extends TestCase
{
    use LazilyRefreshDatabase;

    // admin page

    // his comments
        // positive
            // C -
            // R // test_guest_cannot_view_edit_form_for_an_existing_comment
            // U // test_guest_cannot_update_existing_comment
            // D // test_guest_cannot_delete_the_existing_comment

        // negative
            // C -
            // R // test_guest_cannot_view_edit_form_for_non_existing_comment
            // U // test_guest_cannot_update_non_existing_comment
            // D // test_guest_cannot_delete_non_existing_comment

    // home page

        // his comments
            // positive
                // C // test_guest_cannot_create_a_comment_with_valid_data
                // R // test_guest_can_read_an_existing_comment
                // U // test_guest_cannot_update_the_existing_comment
                // D // test_guest_cannot_delete_the_existing_comment

            // negative
                // C // test_guest_cannot_create_a_comment_with_invalid_data
                // R // test_guest_cannot_read_non_existing_comment
                // U // test_guest_cannot_update_non_existing_comment
                // D // test_guest_cannot_delete_non_existing_comment

}
