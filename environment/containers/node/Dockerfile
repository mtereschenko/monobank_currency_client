FROM node:18-alpine3.15 as development

ARG HOST_UID=1000
ARG HOST_GID=1000

RUN apk add  --no-cache npm

COPY ./containers/node/entrypoint.development.sh /entrypoint/entrypoint.sh
RUN chmod +x /entrypoint/entrypoint.sh
WORKDIR /app
ENTRYPOINT ["sh", "/entrypoint/entrypoint.sh"]
