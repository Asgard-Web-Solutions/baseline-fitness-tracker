{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="space-y-8">
    <div class="w-8/12 mx-auto">
        <flux:card size="lg" class="my-8 space-y-8">
            <flux:heading size="xl">Track Your Journey to the Iron Council's Baseline Physical Aptitude Badge</flux:heading>
            <flux:subheading>Stay motivated, track your progress, and conquer your fitness goals one step at a time.</flux:subheading>
            <flux:separator />
            <div class="flex items-center mx-auto">
                <flux:button href="{{ route('register') }}" variant="primary" class="mx-auto">Get Started</flux:button>
            </div>
        </flux:card>
    </div>

    <flux:separator />

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
        <flux:card size="lg" class="space-y-8">
            <flux:heading>How it Works</flux:heading>
            <flux:subheading class="space-y-8">
                <p>The Baseline Physical Aptitude Badge from the Iron Council challenges you to complete 11 demanding exercises.</p>
                <p>BPA Tracker helps you track your progress as you work toward each goal.</p>
                <p>See which of the exercises you have completed, which you are working on, and those you still need to have a go at.</p>
            </flux:subheading>

            <img src="{{ asset('images/screenshot-enter-stat-bp.png') }}" />
        </flux:card>

        <flux:card size="lg" class="space-y-8">
            <flux:heading>The Iron Council?</flux:heading>
            <flux:subheading class="space-y-8">
                <p>The <a href="https://www.theironcouncil.com/" class="underline hover:no-underline" style="color: #EF6C0D">Iron Council</a> is a group for men that want to level up in life, run by the <a href="https://orderofman.com/" class="underline hover:no-underline" style="color: #EF6C0D">Order of Man Podcast</a>.</p>
                <p>While there are many areas of life that the IC can help you improve in, one of the popular areas is physical fitness. To assist with that goal the IC created the BPA, a course meant to inspire and instruct you.</p>
            </flux:subheading>

            <flux:heading>Do I have to join the Iron Council?</flux:heading>
            <flux:subheading class="space-y-8">
                <p>No, you do not have to join the brotherhood that is the Iron Council in order to use BPA Tracker.</p>
                <p>You can freely track your own progress here as you level up your ability in the exercises that make up the Aptitude badge. Your reward is the knowledge that you are becoming a more capable man (or woman).</p>
            </flux:subheading>
        </flux:card>

    </div>
</div>
