#!/bin/sh
draw/time_latency.average.sh time/latency.graph
draw/time_latency.sh time/latency.graph
draw/time_session.count.sh time/session.count.graph
draw/time_session.retry.sh time/session.retry.graph
draw/time_throughput.sh time/throughput.graph
draw/time_throughput.totaltraffic.sh time/throughput.graph
