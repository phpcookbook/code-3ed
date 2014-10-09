#include <sys/ipc.h>
#include <sys/shm.h>

#include <stdio.h>

int main(int argc, char **argv) {
    char *id;
    size_t size;

    if (argc != 3) {
        fprintf(stderr, "Usage: %s ID SIZE\n", argv[0]);
        return -1;
    }

    id = argv[1];
    size = atoi(argv[2]);

    char *path;
    asprintf(&path, "/tmp/pcshm_%s", id);
    key_t token = ftok(path, (int) 'R');
    int shmid = shmget(token, size, 0);
    void *ptr = shmat(shmid, 0, SHM_RDONLY);
    printf("%*s\n", (int) size, (char *) ptr);
    shmdt(ptr);
    free(path);
}
