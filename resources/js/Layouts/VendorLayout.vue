<script setup>
import {ref} from 'vue';
import {Head, Link, router} from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="font-sans text-gray-800">
        <Head :title="title"/>
        <Banner/>

        <div class="min-h-screen bg-gray-50">
            <nav class="bg-white shadow-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center space-x-6">
                            <div class="flex-shrink-0">
                                <Link :href="route('dashboard')">
                                    <ApplicationMark class="h-10 w-auto"/>
                                </Link>
                            </div>

                            <div class="hidden space-x-8 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('vendor.my-store')" :active="route().current('vendor.my-store')">
                                    My Store
                                </NavLink>
                                <NavLink :href="route('vendor.enquiries')"
                                         :active="route().current('vendor.enquiries')">
                                    Customer Enquiries
                                </NavLink>
                                <NavLink :href="route('vendor.undertakings')"
                                         :active="route().current('vendor.undertakings')">
                                    Undertakings
                                </NavLink>
                                <NavLink :href="route('vendor.calendar')" :active="route().current('vendor.calendar')">
                                    Calendar
                                </NavLink>
<!--                                <NavLink :href="route('vendor.communications')"-->
<!--                                         :active="route().current('vendor.communications')">-->
<!--                                    Communications-->
<!--                                </NavLink>-->
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:items-center space-x-6">
                            <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                                <template #trigger>
                                    <button type="button"
                                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border rounded-md shadow hover:bg-gray-100 focus:outline-none transition">
                                        {{ $page.props.auth.user.current_team.name }}
                                        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <div class="w-60">
                                        <div class="px-4 py-2 text-xs text-gray-400">Manage Team</div>
                                        <DropdownLink :href="route('teams.show', $page.props.auth.user.current_team)">
                                            Team Settings
                                        </DropdownLink>
                                        <DropdownLink v-if="$page.props.jetstream.canCreateTeams"
                                                      :href="route('teams.create')">Create New Team
                                        </DropdownLink>
                                        <template v-if="$page.props.auth.user.all_teams.length > 1">
                                            <div class="border-t border-gray-200"></div>
                                            <div class="px-4 py-2 text-xs text-gray-400">Switch Teams</div>
                                            <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                                <form @submit.prevent="switchToTeam(team)">
                                                    <DropdownLink as="button">
                                                        <div class="flex items-center">
                                                            <svg v-if="team.id == $page.props.auth.user.current_team_id"
                                                                 class="mr-2 h-5 w-5 text-green-400"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 24 24" stroke-width="1.5"
                                                                 stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                            </svg>
                                                            <div>{{ team.name }}</div>
                                                        </div>
                                                    </DropdownLink>
                                                </form>
                                            </template>
                                        </template>
                                    </div>
                                </template>
                            </Dropdown>

                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="flex items-center p-2 border-2 rounded-full focus:outline-none hover:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                             :src="$page.props.auth.user.profile_photo_url"
                                             :alt="$page.props.auth.user.name"
                                             v-if="$page.props.jetstream.managesProfilePhotos"/>
                                        <span v-else
                                              class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border rounded-md shadow hover:bg-gray-100 focus:outline-none transition">
                                            {{ $page.props.auth.user.name }}
                                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                            </svg>
                                        </span>
                                    </button>
                                </template>

                                <template #content>
                                    <div class="block px-4 py-2 text-xs text-gray-400">Manage Account</div>
                                    <DropdownLink :href="route('profile.show')">Profile</DropdownLink>
                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                                  :href="route('api-tokens.index')">API Tokens
                                    </DropdownLink>
                                    <div class="border-t border-gray-200"></div>
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button">Log Out</DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                @click="showingNavigationDropdown = !showingNavigationDropdown">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                    <path
                                        :class="{'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown}"
                     class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('vendor.my-store')"
                                           :active="route().current('vendor.my-store')">My Store
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('vendor.enquiries')"
                                           :active="route().current('vendor.enquiries')">Customer Enquiries
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('vendor.undertakings')"
                                           :active="route().current('vendor.undertakings')">Undertakings
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('vendor.calendar')"
                                           :active="route().current('vendor.calendar')">Calendar
                        </ResponsiveNavLink>
<!--                        <ResponsiveNavLink :href="route('vendor.communications')"-->
<!--                                           :active="route().current('vendor.communications')">Communications-->
<!--                        </ResponsiveNavLink>-->
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover"
                                     :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name"/>
                            </div>
                            <div>
                                <div class="font-semibold text-lg text-gray-800">{{ $page.props.auth.user.name }}</div>
                                <div class="text-sm text-gray-600">{{ $page.props.auth.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures"
                                               :href="route('api-tokens.index')"
                                               :active="route().current('api-tokens.index')">API Tokens
                            </ResponsiveNavLink>
                            <form @submit.prevent="logout">
                                <ResponsiveNavLink as="button">Log Out</ResponsiveNavLink>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-gray-200"></div>
                                <div class="px-4 py-2 text-xs text-gray-400">Manage Team</div>
                                <ResponsiveNavLink :href="route('teams.show', $page.props.auth.user.current_team)"
                                                   :active="route().current('teams.show')">Team Settings
                                </ResponsiveNavLink>
                                <ResponsiveNavLink v-if="$page.props.jetstream.canCreateTeams"
                                                   :href="route('teams.create')"
                                                   :active="route().current('teams.create')">Create New Team
                                </ResponsiveNavLink>
                                <template v-if="$page.props.auth.user.all_teams.length > 1">
                                    <div class="border-t border-gray-200"></div>
                                    <div class="px-4 py-2 text-xs text-gray-400">Switch Teams</div>
                                    <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                        <form @submit.prevent="switchToTeam(team)">
                                            <ResponsiveNavLink as="button">
                                                <div class="flex items-center">
                                                    <svg v-if="team.id == $page.props.auth.user.current_team_id"
                                                         class="mr-2 h-5 w-5 text-green-400"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <div>{{ team.name }}</div>
                                                </div>
                                            </ResponsiveNavLink>
                                        </form>
                                    </template>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4">
                <slot/>
            </main>
        </div>
    </div>
</template>

<style scoped>
/* Custom styles for a more elegant look */
.bg-gray-50 {
    background-color: #f8fafc;
}

.bg-white {
    background-color: #ffffff;
}

.text-gray-800 {
    color: #2d3748;
}

.text-gray-700 {
    color: #4a5568;
}

.text-gray-600 {
    color: #718096;
}

.text-gray-400 {
    color: #cbd5e0;
}

.shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.rounded-md {
    border-radius: 0.375rem;
}

.border {
    border-width: 1px;
}

.border-t {
    border-top-width: 1px;
}

.transition {
    transition: all 0.2s ease-in-out;
}

.hover\:bg-gray-100:hover {
    background-color: #f7fafc;
}

.hover\:border-gray-300:hover {
    border-color: #d2d6dc;
}
</style>
